<?php

namespace Kirby\Data;

use Kirby\Toolkit\A;
use Symfony\Component\Yaml\Yaml as Symfony;

/**
 * Simple Wrapper around the Symfony YAML class
 *
 * @package   Kirby Data
 * @author    Nico Hoffmann <nico@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class YamlSymfony
{
	/**
	 * Converts an array to an encoded YAML string
	 */
	public static function encode($data): string
	{
		return Symfony::dump(
			$data,
			2,
			2,
			Symfony::DUMP_MULTI_LINE_LITERAL_BLOCK | Symfony::DUMP_EMPTY_ARRAY_AS_SEQUENCE
		);
	}

	/**
	 * Parses an encoded YAML string and returns a multi-dimensional array
	 */
	public static function decode($string): array
	{
		$result = Symfony::parse($string);
		$result = A::wrap($result);
		return $result;
	}
}
