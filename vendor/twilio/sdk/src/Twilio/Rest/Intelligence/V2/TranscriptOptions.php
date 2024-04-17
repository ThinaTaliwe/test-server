<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Intelligence
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Intelligence\V2;

use Twilio\Options;
use Twilio\Values;

abstract class TranscriptOptions
{
    /**
     * @param string $customerKey Used to store client provided metadata. Maximum of 64 double-byte UTF8 characters.
     * @param \DateTime $mediaStartTime The date that this Transcript's media was started, given in ISO 8601 format.
     * @return CreateTranscriptOptions Options builder
     */
    public static function create(
        
        string $customerKey = Values::NONE,
        \DateTime $mediaStartTime = null

    ): CreateTranscriptOptions
    {
        return new CreateTranscriptOptions(
            $customerKey,
            $mediaStartTime
        );
    }



    /**
     * @param string $serviceSid The unique SID identifier of the Service.
     * @param string $beforeStartTime Filter by before StartTime.
     * @param string $afterStartTime Filter by after StartTime.
     * @param string $beforeDateCreated Filter by before DateCreated.
     * @param string $afterDateCreated Filter by after DateCreated.
     * @param string $status Filter by status.
     * @param string $languageCode Filter by Language Code.
     * @param string $sourceSid Filter by SourceSid.
     * @return ReadTranscriptOptions Options builder
     */
    public static function read(
        
        string $serviceSid = Values::NONE,
        string $beforeStartTime = Values::NONE,
        string $afterStartTime = Values::NONE,
        string $beforeDateCreated = Values::NONE,
        string $afterDateCreated = Values::NONE,
        string $status = Values::NONE,
        string $languageCode = Values::NONE,
        string $sourceSid = Values::NONE

    ): ReadTranscriptOptions
    {
        return new ReadTranscriptOptions(
            $serviceSid,
            $beforeStartTime,
            $afterStartTime,
            $beforeDateCreated,
            $afterDateCreated,
            $status,
            $languageCode,
            $sourceSid
        );
    }

}

class CreateTranscriptOptions extends Options
    {
    /**
     * @param string $customerKey Used to store client provided metadata. Maximum of 64 double-byte UTF8 characters.
     * @param \DateTime $mediaStartTime The date that this Transcript's media was started, given in ISO 8601 format.
     */
    public function __construct(
        
        string $customerKey = Values::NONE,
        \DateTime $mediaStartTime = null

    ) {
        $this->options['customerKey'] = $customerKey;
        $this->options['mediaStartTime'] = $mediaStartTime;
    }

    /**
     * Used to store client provided metadata. Maximum of 64 double-byte UTF8 characters.
     *
     * @param string $customerKey Used to store client provided metadata. Maximum of 64 double-byte UTF8 characters.
     * @return $this Fluent Builder
     */
    public function setCustomerKey(string $customerKey): self
    {
        $this->options['customerKey'] = $customerKey;
        return $this;
    }

    /**
     * The date that this Transcript's media was started, given in ISO 8601 format.
     *
     * @param \DateTime $mediaStartTime The date that this Transcript's media was started, given in ISO 8601 format.
     * @return $this Fluent Builder
     */
    public function setMediaStartTime(\DateTime $mediaStartTime): self
    {
        $this->options['mediaStartTime'] = $mediaStartTime;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Intelligence.V2.CreateTranscriptOptions ' . $options . ']';
    }
}



class ReadTranscriptOptions extends Options
    {
    /**
     * @param string $serviceSid The unique SID identifier of the Service.
     * @param string $beforeStartTime Filter by before StartTime.
     * @param string $afterStartTime Filter by after StartTime.
     * @param string $beforeDateCreated Filter by before DateCreated.
     * @param string $afterDateCreated Filter by after DateCreated.
     * @param string $status Filter by status.
     * @param string $languageCode Filter by Language Code.
     * @param string $sourceSid Filter by SourceSid.
     */
    public function __construct(
        
        string $serviceSid = Values::NONE,
        string $beforeStartTime = Values::NONE,
        string $afterStartTime = Values::NONE,
        string $beforeDateCreated = Values::NONE,
        string $afterDateCreated = Values::NONE,
        string $status = Values::NONE,
        string $languageCode = Values::NONE,
        string $sourceSid = Values::NONE

    ) {
        $this->options['serviceSid'] = $serviceSid;
        $this->options['beforeStartTime'] = $beforeStartTime;
        $this->options['afterStartTime'] = $afterStartTime;
        $this->options['beforeDateCreated'] = $beforeDateCreated;
        $this->options['afterDateCreated'] = $afterDateCreated;
        $this->options['status'] = $status;
        $this->options['languageCode'] = $languageCode;
        $this->options['sourceSid'] = $sourceSid;
    }

    /**
     * The unique SID identifier of the Service.
     *
     * @param string $serviceSid The unique SID identifier of the Service.
     * @return $this Fluent Builder
     */
    public function setServiceSid(string $serviceSid): self
    {
        $this->options['serviceSid'] = $serviceSid;
        return $this;
    }

    /**
     * Filter by before StartTime.
     *
     * @param string $beforeStartTime Filter by before StartTime.
     * @return $this Fluent Builder
     */
    public function setBeforeStartTime(string $beforeStartTime): self
    {
        $this->options['beforeStartTime'] = $beforeStartTime;
        return $this;
    }

    /**
     * Filter by after StartTime.
     *
     * @param string $afterStartTime Filter by after StartTime.
     * @return $this Fluent Builder
     */
    public function setAfterStartTime(string $afterStartTime): self
    {
        $this->options['afterStartTime'] = $afterStartTime;
        return $this;
    }

    /**
     * Filter by before DateCreated.
     *
     * @param string $beforeDateCreated Filter by before DateCreated.
     * @return $this Fluent Builder
     */
    public function setBeforeDateCreated(string $beforeDateCreated): self
    {
        $this->options['beforeDateCreated'] = $beforeDateCreated;
        return $this;
    }

    /**
     * Filter by after DateCreated.
     *
     * @param string $afterDateCreated Filter by after DateCreated.
     * @return $this Fluent Builder
     */
    public function setAfterDateCreated(string $afterDateCreated): self
    {
        $this->options['afterDateCreated'] = $afterDateCreated;
        return $this;
    }

    /**
     * Filter by status.
     *
     * @param string $status Filter by status.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status): self
    {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Filter by Language Code.
     *
     * @param string $languageCode Filter by Language Code.
     * @return $this Fluent Builder
     */
    public function setLanguageCode(string $languageCode): self
    {
        $this->options['languageCode'] = $languageCode;
        return $this;
    }

    /**
     * Filter by SourceSid.
     *
     * @param string $sourceSid Filter by SourceSid.
     * @return $this Fluent Builder
     */
    public function setSourceSid(string $sourceSid): self
    {
        $this->options['sourceSid'] = $sourceSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Intelligence.V2.ReadTranscriptOptions ' . $options . ']';
    }
}

