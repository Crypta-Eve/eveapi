<?php
/*
This file is part of SeAT

Copyright (C) 2015  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Seat\Eveapi\Api\Corporation;

use Seat\Eveapi\Api\Base;
use Seat\Eveapi\Models\Corporation\AccountBalance as AccountBalanceModel;

/**
 * Class AccountBalance
 * @package Seat\Eveapi\Api\Corporation
 */
class AccountBalance extends Base
{

    /**
     * Run the Update
     *
     * @return mixed|void
     */
    public function call()
    {

        $pheal = $this->setScope('corp')
            ->setCorporationID()->getPheal();

        $result = $pheal->AccountBalance();

        foreach ($result->accounts as $account) {

            $account_balance = AccountBalanceModel::firstOrNew([
                'corporationID' => $this->corporationID,
                'accountID'     => $account->accountID]);

            $account_balance->fill([
                'accountKey' => $account->accountKey,
                'balance'    => $account->balance
            ]);

            $account_balance->save();
        }

        return;
    }
}
