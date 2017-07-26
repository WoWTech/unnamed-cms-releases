<?php

namespace App\Auth\Hashing;

use RuntimeException;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class ShaHasher implements HasherContract
{

    public function make($data, array $options = [])
    {
        $hash = strtoupper(SHA1(strtoupper($data[0]).':'.strtoupper($data[1])));

        if ($hash === false) {
          throw new RuntimeException('SHA Hasher is not available');
        }

        return $hash;
    }

    public function check($data, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) == 0) {
          return false;
        }

        $hash = $this->make($data);

        return $hash === $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }

}
