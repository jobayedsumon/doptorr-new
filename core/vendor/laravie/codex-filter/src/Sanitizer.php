<?php

namespace Laravie\Codex\Filter;

use Laravie\Codex\Contracts\Cast as CastContract;
use Laravie\Codex\Contracts\Sanitizer as SanitizerContract;

class Sanitizer implements SanitizerContract
{
    /**
     * Sanitization rules.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Add sanitization rules.
     *
     * @param  string|array  $group
     * @return $this
     */
    public function add($group, CastContract $cast)
    {
        $this->casts = \igorw\assoc_in($this->casts, (array) $group, $cast);

        return $this;
    }

    /**
     * Sanitize request.
     */
    public function from(array $inputs, array $group = []): array
    {
        $data = [];

        foreach ($inputs as $name => $input) {
            $data[$name] = $this->sanitizeFrom($input, $name, $group);
        }

        return $data;
    }

    /**
     * Sanitize response.
     */
    public function to(array $inputs, array $group = []): array
    {
        $data = [];

        foreach ($inputs as $name => $input) {
            $data[$name] = $this->sanitizeTo($input, $name, $group);
        }

        return $data;
    }

    /**
     * Sanitize request from.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function sanitizeFrom($value, string $name, array $group = [])
    {
        array_push($group, $name);

        $caster = $this->resolveCaster($group);

        if (\is_array($value) && \is_null($caster)) {
            return $this->from($value, $group);
        }

        return ! \is_null($caster)
            ? $caster->from($value)
            : $value;
    }

    /**
     * Sanitize response to.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function sanitizeTo($value, string $name, array $group = [])
    {
        array_push($group, $name);

        $caster = $this->resolveCaster($group);

        if (\is_array($value) && \is_null($caster)) {
            return $this->to($value, $group);
        }

        return ! \is_null($caster)
            ? $caster->to($value)
            : $value;
    }

    /**
     * Get caster.
     *
     * @param  string|array  $group
     */
    protected function resolveCaster($group): ?CastContract
    {
        $cast = \igorw\get_in($this->casts, (array) $group);

        if (is_subclass_of($cast, CastContract::class)) {
            return \is_string($cast) ? new $cast() : $cast;
        }

        return null;
    }
}
