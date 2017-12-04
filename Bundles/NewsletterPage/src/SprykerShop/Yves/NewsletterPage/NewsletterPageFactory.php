<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\NewsletterPage;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\NewsletterPage\Form\DataProvider\NewsletterSubscriptionFormDataProvider;
use SprykerShop\Yves\NewsletterPage\Form\Handler\NewsletterSubscriptionFormHandler;
use SprykerShop\Yves\NewsletterPage\Form\NewsletterSubscriptionForm;

class NewsletterPageFactory extends AbstractFactory
{
    /**
     * @return \SprykerShop\Yves\NewsletterPage\Form\DataProvider\NewsletterSubscriptionFormDataProvider
     */
    public function createNewsletterSubscriptionFormDataProvider()
    {
        return new NewsletterSubscriptionFormDataProvider($this->getNewsletterClient());
    }

    /**
     * @param array|null $data
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createNewsletterSubscriptionForm(array $data = null, array $options = [])
    {
        return $this->getFormFactory()->create($this->createNewsletterSubscriptionFormType(), $data, $options);
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface
     */
    protected function createNewsletterSubscriptionFormType()
    {
        return new NewsletterSubscriptionForm();
    }

    /**
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getFormFactory()
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    /**
     * @return \Spryker\Client\Newsletter\NewsletterClientInterface
     */
    public function getNewsletterClient()
    {
        return $this->getProvidedDependency(NewsletterPageDependencyProvider::CLIENT_NEWSLETTER);
    }

    /**
     * @return \Spryker\Client\Customer\CustomerClientInterface
     */
    public function getCustomerClient()
    {
        return $this->getProvidedDependency(NewsletterPageDependencyProvider::CLIENT_CUSTOMER);
    }
}
