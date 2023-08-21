<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Transaction;
use Authorization\IdentityInterface;

/**
 * Transaction policy
 */
class TransactionPolicy
{
    /**
     * Check if $user can add Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Transaction $transaction)
    {
        return true;
    }

    /**
     * Check if $user can edit Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Transaction $transaction)
    {
        return $this->isAuthor($user, $transaction);
    }

    /**
     * Check if $user can delete Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Transaction $transaction)
    {
        return $this->isAuthor($user, $transaction);
    }

    /**
     * Check if $user can view Assets
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Transaction $transaction
     * @return bool
     */
    // public function canView(IdentityInterface $user, Transaction $transaction)
    // {
    //     return $this->isAuthor($user, $transaction);
    // }

    protected function isAuthor(IdentityInterface $user, Transaction $transaction)
    {
        return $transaction->user_id === $user->getIdentifier();
    }
}