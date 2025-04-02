<?php

namespace Extcode\Contacts\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Company extends AbstractContact
{
    /**
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $name;

    /**
     * @var string
     */
    protected $legalName = '';

    /**
     * @var string
     */
    protected $legalForm = '';

    /**
     * @var string
     */
    protected $registeredOffice = '';

    /**
     * @var string
     */
    protected $registerCourt = '';

    /**
     * @var string
     */
    protected $registerNumber = '';

    /**
     * @var string
     */
    protected $vatId = '';

    /**
     * @var ObjectStorage<Contact>
     */
    protected $directors;

    /**
     * @var ObjectStorage<Contact>
     */
    protected $contacts;

    /**
     * @var ObjectStorage<Company>
     */
    protected $companies;

    /**
     * @var FileReference
     */
    protected $logo = null;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @throws \InvalidArgumentException
     */
    public function setName(string $name): void
    {
        if (strlen($name) == 0) {
            throw new \InvalidArgumentException(
                'The name can not be blank.',
                1373527548
            );
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * @param string $legalName
     */
    public function setLegalName(string $legalName): void
    {
        $this->legalName = $legalName;
    }

    /**
     * @return string
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * @param string $legalForm
     */
    public function setLegalForm(string $legalForm): void
    {
        $this->legalForm = $legalForm;
    }

    /**
     * @return string
     */
    public function getRegisteredOffice()
    {
        return $this->registeredOffice;
    }

    /**
     * @param string $registeredOffice
     */
    public function setRegisteredOffice(string $registeredOffice): void
    {
        $this->registeredOffice = $registeredOffice;
    }

    /**
     * @return string
     */
    public function getRegisterCourt()
    {
        return $this->registerCourt;
    }

    /**
     * @param string $registerCourt
     */
    public function setRegisterCourt(string $registerCourt): void
    {
        $this->registerCourt = $registerCourt;
    }

    /**
     * @return string
     */
    public function getRegisterNumber()
    {
        return $this->registerNumber;
    }

    /**
     * @param string $registerNumber
     */
    public function setRegisterNumber(string $registerNumber): void
    {
        $this->registerNumber = $registerNumber;
    }

    /**
     * @return string
     */
    public function getVatId()
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     */
    public function setVatId(string $vatId): void
    {
        $this->vatId = $vatId;
    }

    /**
     * @param Contact $director
     */
    public function addDirector(Contact $director): void
    {
        $this->directors->attach($director);
    }

    /**
     * @param Contact $director
     */
    public function removeDirector(Contact $director): void
    {
        $this->directors->detach($director);
    }

    /**
     * @return ObjectStorage<Contact>
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * @param ObjectStorage<Contact> $directors
     */
    public function setDirectors($directors): void
    {
        $this->directors = $directors;
    }

    /**
     * @param Contact $contact
     */
    public function addContact(Contact $contact): void
    {
        $this->contacts->attach($contact);
    }

    /**
     * @param Contact $contact
     */
    public function removeContact(Contact $contact): void
    {
        $this->contacts->detach($contact);
    }

    /**
     * @return ObjectStorage<Contact> $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param ObjectStorage<Contact> $contacts
     */
    public function setContacts(ObjectStorage $contacts): void
    {
        $this->contacts = $contacts;
    }

    /**
     * @param Company $company
     */
    public function addCompany(self $company): void
    {
        $this->companies->attach($company);
    }

    /**
     * @param Company $company
     */
    public function removeCompany(self $company): void
    {
        $this->companies->detach($company);
    }

    /**
     * @return ObjectStorage<Company> $companies
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param ObjectStorage<Company> $companies
     */
    public function setCompanies(ObjectStorage $companies): void
    {
        $this->companies = $companies;
    }

    /**
     * @return FileReference
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param FileReference $logo
     */
    public function setLogo(FileReference $logo): void
    {
        $this->logo = $logo;
    }
}
