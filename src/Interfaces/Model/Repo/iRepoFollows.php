<?php
namespace Module\Folio\Interfaces\Model\Repo;

use Module\Folio\Interfaces\Model\iEntityFollow;


interface iRepoFollows
{
    const SORT_ASC   = 'asc';
    const SORT_DESC  = 'desc';


    /**
     * Generate next unique identifier to persist
     * data with
     *
     * @param null|string $id
     *
     * @return mixed
     */
    function attainNextIdentifier($id = null);


    /**
     * Persist Follow Request
     *
     * note: Only One Request With Each Unique Incoming-Outgoing
     *       Must Persist.
     *
     * @param iEntityFollow $entity
     *
     * @return iEntityFollow
     */
    function save(iEntityFollow $entity);

    /**
     * Find an Entity With Given UID
     *
     * @param mixed $uid
     *
     * @return iEntityFollow|null
     */
    function findOneByUID($uid);

    /**
     * Find One Interaction Between Receiver Of Request And Requester
     *
     * @param mixed $incoming
     * @param mixed $outgoing
     *
     * @return iEntityFollow|null
     */
    function findOneWithInteraction($incoming, $outgoing);

    /**
     * Find All Follows Has Specific Status
     *
     * @param array  $status
     * @param string $offset
     * @param int    $limit
     *
     * @return \Traversable
     */
    function findAllHasStatus(array $status, $offset = null, $limit = null);

    /**
     * Find All Follow Requests Match Incoming UID
     *
     * @param mixed  $incoming
     * @param array  $status   If given filter for these specific status
     * @param int    $limit
     * @param string $offset;
     * @param mixed  $sort
     *
     * @return \Traversable
     */
    function findAllForIncoming($incoming, array $status = null, $limit = 30, $offset = null, $sort = self::SORT_DESC);

    /**
     * Get Count All Incoming Request For
     *
     * @param $incoming
     * @param array|null $status
     *
     * @return int
     */
    function getCountAllForIncoming($incoming, array $status = null);

    /**
     * Find All Follow Requests Match Outgoing UID
     *
     * @param mixed   $outgoing
     * @param array   $status   If given filter for these specific status
     * @param int     $limit
     * @param string  $offset;
     * @param mixed   $sort
     * @return \Traversable
     */
    function findAllForOutgoings($outgoing, array $status = null, $limit = 30, $offset = null, $sort=self::SORT_DESC);

    /**
     * Get Count All Outgoing Request For
     *
     * @param $outgoing
     * @param array|null $status
     *
     * @return int
     */
    function getCountAllForOutgoing($outgoing, array $status = null);

    /**
     * Delete Entity By Given Id
     *
     * @param mixed $followId
     *
     * @return int
     */
    function deleteById($followId);
}
