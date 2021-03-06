<?php
namespace Module\Folio\Events;

use Module\Profile\Model\Driver\Mongo\AvatarsEmbedRepo;
use Module\Profile\Model\Entity\EntityAvatar;


/**
 * When Avatar Changed Due Actions,
 * It Will Notify And Embed avatar entity into profile
 */
// TODO background task
class OnChangeAvatarEmbedToProfile
{
    /** @var AvatarsEmbedRepo */
    protected $repoAvatarsEmbed;


    /**
     * OnChangeAvatarEmbedToProfile constructor.
     *
     * @param AvatarsEmbedRepo $repoAvatarsEmbed @IoC /module/folio/services/repository/AvatarsEmbed
     */
    function __construct($repoAvatarsEmbed)
    {
        $this->repoAvatarsEmbed = $repoAvatarsEmbed;
    }


    /**
     * @param EntityAvatar $entity_avatar
     */
    function __invoke($entity_avatar)
    {
        $this->repoAvatarsEmbed->save($entity_avatar);
    }
}
