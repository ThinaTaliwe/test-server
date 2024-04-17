<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Insights
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Insights\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Serialize;


class SettingContext extends InstanceContext
    {
    /**
     * Initialize the SettingContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/Voice/Settings';
    }

    /**
     * Fetch the SettingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SettingInstance Fetched SettingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): SettingInstance
    {

        $options = new Values($options);

        $params = Values::of([
            'SubaccountSid' =>
                $options['subaccountSid'],
        ]);

        $payload = $this->version->fetch('GET', $this->uri, $params);

        return new SettingInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Update the SettingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SettingInstance Updated SettingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): SettingInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'AdvancedFeatures' =>
                Serialize::booleanToString($options['advancedFeatures']),
            'VoiceTrace' =>
                Serialize::booleanToString($options['voiceTrace']),
            'SubaccountSid' =>
                $options['subaccountSid'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new SettingInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Insights.V1.SettingContext ' . \implode(' ', $context) . ']';
    }
}
