<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Dividend;
use Authorization\IdentityInterface;

/**
 * Dividend policy
 */
class DividendPolicy
{
    /**
     * Check if $user can add Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Dividend $dividend
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Dividend $dividend)
    {
        return true;
    }

    /**
     * Check if $user can edit Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Dividend $dividend
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Dividend $dividend)
    {
        return $this->isAuthor($user, $dividend);
    }

    /**
     * Check if $user can delete Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Dividend $dividend
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Dividend $dividend)
    {
        return $this->isAuthor($user, $dividend);
    }

    /**
     * Check if $user can view Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Dividend $dividend
     * @return bool
     */
    // public function canView(IdentityInterface $user, Dividend $dividend)
    // {
    //     return $this->isAuthor($user, $dividend);
    // }

    protected function isAuthor(IdentityInterface $user, Dividend $dividend)
    {
        return $dividend->user_id === $user->getIdentifier();
    }
}