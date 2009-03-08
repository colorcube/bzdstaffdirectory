<?php
/***************************************************************
* Copyright notice
*
* (c) 2008-2009 Mario Rimann (mario@screenteam.com)
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_Autoloader.php');

/**
 * Testcase for the person class in the 'bzdstaffdirectory' extension.
 *
 * @package		TYPO3
 * @subpackage	tx_bzdstaffdirectory
 * @author		Mario Rimann <mario@screenteam.com>
 */
class tx_bzdstaffdirectory_Model_Person_testcase extends tx_phpunit_testcase {
	private $fixture;
	private $uid;

	protected function setUp() {
		$this->testingFramework = new tx_oelib_testingFramework('tx_bzdstaffdirectory');

		$this->uid = $this->testingFramework->createRecord(
			'tx_bzdstaffdirectory_persons',
			array(
				'first_name' => 'Max',
				'last_name' => 'Muster',
				'title' => 'Dr.',
				'officehours' => '07:00 - 17:00',
				'function' => 'Master of Desaster',
				'nickname' => 'Mickey Mouse',
				'phone' => '+41 44 123 45 67',
				'mobile_phone' => '+41 79 123 45 67',
				'room' => '301',
				'email' => 'chief@example.org',
				'date_birthdate' => strtotime("-10 years"),
				'xing_profile_url' => 'http://www.xing.com/profile/foo.bar',
			)
		);
		$this->createPerson($this->uid);
	}

	protected function tearDown() {
		$this->testingFramework->cleanUp();
		unset($this->testingFramework);
		unset($this->fixture);
	}

	/**
	 * Creates a person in $this->fixture.
	 *
	 * @param integer a person's UID, must be >= 0
	 */
	private function createPerson($personUid) {
		try {
			$this->fixture = tx_oelib_MapperRegistry::get('tx_bzdstaffdirectory_Mapper_Person')
					->find($personUid);
		} catch (tx_oelib_Exception_NotFound $exception) {
			$this->fixture = null;
		}
	}




	public function testGetUid() {
		$this->assertEquals(
			$this->uid,
			$this->fixture->getUid()
		);
	}

	public function testGetFirstName() {
		$this->assertEquals(
			'Max',
			$this->fixture->getFirstName()
		);
	}

	public function testGetLastName() {
		$this->assertEquals(
			'Muster',
			$this->fixture->getLastName()
		);
	}

	public function testHasTitleReturnsTrueWithSetTitle() {
		$this->assertTrue(
			$this->fixture->hasTitle()
		);
	}

	public function testGetTitleReturnsTitle() {
		$this->assertEquals(
			'Dr.',
			$this->fixture->getTitle()
		);
	}

	public function testHasStandardFieldReturnsTrueOnValidKeyAndFilledField() {
		$this->assertTrue($this->fixture->hasStandardField('room'));
	}

	public function testHasStandardFieldReturnsFalseOnValidKeyButEmptyField() {
		$personUid = $this->testingFramework->createRecord(
			'tx_bzdstaffdirectory_persons',
			array()
		);
		$this->createPerson($personUid);

		$this->assertFalse($this->fixture->hasStandardField('function'));
	}

	public function testHasStandardFieldThrowsExceptionOnEmptyKey() {
		$this->setExpectedException(
			'Exception', '$key must not be empty!'
		);

		$this->fixture->hasStandardField('');
	}

	public function testHasStandardFieldThrowsExceptionOnIllegalKey() {
		$this->setExpectedException(
			'Exception', 'foobar was an illegal key!'
		);

		$this->fixture->hasStandardField('foobar');
	}

	public function testGetStandardFieldThrowsExceptionOnIllegalKey() {
		$this->setExpectedException(
			'Exception', 'foobar was an illegal key!'
		);

		$this->fixture->getStandardField('foobar');
	}

	public function testGetStandardFieldThrowsExceptionOnEmptyKey() {
		$this->setExpectedException(
			'Exception', '$key must not be empty!'
		);

		$this->fixture->getStandardField('');
	}

	public function testGetStandardFieldWithRoom() {
		$this->assertEquals(
			'301',
			$this->fixture->getStandardField('room')
		);
	}

	public function testGetStandardFieldWithOfficeHours() {
		$this->assertEquals(
			'07:00 - 17:00',
			$this->fixture->getStandardField('officehours')
		);
	}

	public function testGetStandardFieldWithNickname() {
		$this->assertEquals(
			'Mickey Mouse',
			$this->fixture->getStandardField('nickname')
		);
	}

	public function testGetStandardFieldWithPhone() {
		$this->assertEquals(
			'+41 44 123 45 67',
			$this->fixture->getStandardField('phone')
		);
	}

	public function testGetStandardFieldWithMobilePhone() {
		$this->assertEquals(
			'+41 79 123 45 67',
			$this->fixture->getStandardField('mobile_phone')
		);
	}

	public function testGetStandardFieldWithFunction() {
		$this->assertEquals(
			'Master of Desaster',
			$this->fixture->getStandardField('function')
		);
	}

	public function testGetStandardFieldWithEmail() {
		$this->assertEquals(
			'chief@example.org',
			$this->fixture->getStandardField('email')
		);
	}

	public function testHasBirthDateReturnsTrueIfBirthDateSet() {
		$this->assertTrue(
			$this->fixture->hasBirthDate()
		);
	}

	public function testHasBirthDateReturnsFalseIfNoBirthDateSet() {
		$personUid = $this->testingFramework->createRecord(
			'tx_bzdstaffdirectory_persons',
			array()
		);
		$this->createPerson($personUid);

		$this->assertFalse(
			$this->fixture->hasBirthDate()
		);
	}

	public function testGetBirthDateReturnsDateObject() {
		$this->assertTrue(
			is_a($this->fixture->getBirthDate(), DateTime)
		);
	}

	public function testGetBirthDateReturnsCorrectBirthDate() {
		$this->assertEquals(
			date('Y-m-d', strtotime("-10 years")),
			$this->fixture->getBirthDate()->format('Y-m-d')
		);
	}

	public function testGetAgeReturnsInteger() {
		$this->assertTrue(
			is_int($this->fixture->getAge())
		);
	}

	public function testGetAgeReturnsCorrectValue() {
		$this->assertEquals(
			10,
			$this->fixture->getAge()
		);
	}

	public function testHasXingProfileReturnsTrueIfLinkIsSet() {
		$this->assertTrue(
			$this->fixture->hasXingProfile()
		);
	}

	public function testHasXingProfileReturnsFalseIfNoLinkIsSet() {
		$personUid = $this->testingFramework->createRecord(
			'tx_bzdstaffdirectory_persons',
			array()
		);
		$this->createPerson($personUid);

		$this->assertFalse(
			$this->fixture->hasXingProfile()
		);
	}

	public function testGetXingProfileLinkReturnsTheStoredLink() {
		$this->assertEquals(
			'http://www.xing.com/profile/foo.bar',
			$this->fixture->getXingProfileLink()
		);
	}

	public function testGetXingProfileLinkReturnsEmptyStringIfNoProfileSet() {
		$personUid = $this->testingFramework->createRecord(
			'tx_bzdstaffdirectory_persons',
			array()
		);
		$this->createPerson($personUid);

		$this->assertEquals(
			'',
			$this->fixture->getXingProfileLink()
		);
	}

}

?>
