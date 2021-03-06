<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Behat\Page\Admin\Order;

use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

class IndexPage extends BaseIndexPage implements IndexPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function specifyFilterDateFrom(string $dateTime)
    {
        $dateAndTime = explode(' ', $dateTime);

        $this->getDocument()->fillField('criteria_date_from_date', $dateAndTime[0]);
        $this->getDocument()->fillField('criteria_date_from_time', $dateAndTime[1] ?? '');
    }

    /**
     * {@inheritdoc}
     */
    public function specifyFilterDateTo(string $dateTime)
    {
        $dateAndTime = explode(' ', $dateTime);

        $this->getDocument()->fillField('criteria_date_to_date', $dateAndTime[0]);
        $this->getDocument()->fillField('criteria_date_to_time', $dateAndTime[1] ?? '');
    }

    /**
     * {@inheritdoc}
     */
    public function chooseChannelFilter($channelName)
    {
        $this->getElement('filter_channel')->selectOption($channelName);
    }

    /**
     * {@inheritdoc}
     */
    public function chooseCurrencyFilter($currencyName)
    {
        $this->getElement('filter_currency')->selectOption($currencyName);
    }

    /**
     * {@inheritdoc}
     */
    public function specifyFilterTotalGreaterThan($total)
    {
        $this->getDocument()->fillField('criteria_total_greaterThan', $total);
    }

    /**
     * {@inheritdoc}
     */
    public function specifyFilterTotalLessThan($total)
    {
        $this->getDocument()->fillField('criteria_total_lessThan', $total);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'filter_channel' => '#criteria_channel',
            'filter_currency' => '#criteria_total_currency',
        ]);
    }
}
