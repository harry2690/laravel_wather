<?php

namespace App\Support\Contracts;

use JsonSerializable;

/**
 * Interface Serializable
 *
 * This interface will use array as normalizer; use json as encoder
 */
interface Serializable extends JsonSerializable
{
    /**
     * @return array
     */
    public function normalize();

    /**
     * @param array $data
     * @return static
     */
    public static function denormalize(array $data);

    /**
     * @return string
     */
    public function serialize();

    /**
     * @param string $serialized
     * @return static
     */
    public static function deserialize($serialized);
}
