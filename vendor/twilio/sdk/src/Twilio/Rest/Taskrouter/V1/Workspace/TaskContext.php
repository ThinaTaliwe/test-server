<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Taskrouter
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationList;


/**
 * @property ReservationList $reservations
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationContext reservations(string $sid)
 */
class TaskContext extends InstanceContext
    {
    protected $_reservations;

    /**
     * Initialize the TaskContext
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that the new Task belongs to.
     * @param string $sid The SID of the Task resource to delete.
     */
    public function __construct(
        Version $version,
        $workspaceSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'workspaceSid' =>
            $workspaceSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid)
        .'/Tasks/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the TaskInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []): bool
    {

        $options = new Values($options);

        $headers = Values::of(['If-Match' => $options['ifMatch']]);

        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }


    /**
     * Fetch the TaskInstance
     *
     * @return TaskInstance Fetched TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): TaskInstance
    {

        $payload = $this->version->fetch('GET', $this->uri);

        return new TaskInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }


    /**
     * Update the TaskInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskInstance Updated TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): TaskInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'Attributes' =>
                $options['attributes'],
            'AssignmentStatus' =>
                $options['assignmentStatus'],
            'Reason' =>
                $options['reason'],
            'Priority' =>
                $options['priority'],
            'TaskChannel' =>
                $options['taskChannel'],
            'VirtualStartTime' =>
                Serialize::iso8601DateTime($options['virtualStartTime']),
        ]);

        $headers = Values::of(['If-Match' => $options['ifMatch']]);

        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new TaskInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }


    /**
     * Access the reservations
     */
    protected function getReservations(): ReservationList
    {
        if (!$this->_reservations) {
            $this->_reservations = new ReservationList(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }

        return $this->_reservations;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Taskrouter.V1.TaskContext ' . \implode(' ', $context) . ']';
    }
}
