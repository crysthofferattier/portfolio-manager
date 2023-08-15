<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Assets;
use Authorization\IdentityInterface;

/**
 * Assets policy
 */
class AssetsPolicy
{
    /**
     * Check if $user can add Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Assets $assets
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Assets $assets)
    {
        return true;
    }

    /**
     * Check if $user can edit Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Assets $assets
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Assets $assets)
    {
        return $this->isAuthor($user, $assets);
    }

    /**
     * Check if $user can delete Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Assets $assets
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Assets $assets)
    {
        return $this->isAuthor($user, $assets);
    }

    /**
     * Check if $user can view Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Assets $assets
     * @return bool
     */
    // public function canView(IdentityInterface $user, Assets $assets)
    // {
    //     return $this->isAuthor($user, $assets);
    // }

    protected function isAuthor(IdentityInterface $user, Assets $assets)
    {
        return $assets->user_id === $user->getIdentifier();
    }
}
