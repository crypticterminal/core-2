<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test;

use OC\Config;
use OC\Server;
use OCA\Comments\Dav\CommentsPlugin;

/**
 * Class Server
 *
 * @group DB
 *
 * @package Test
 */
class ServerTest extends \Test\TestCase {
	/** @var Server */
	protected $server;


	public function setUp() {
		parent::setUp();
		$config = new Config(\OC::$configDir);
		$this->server = new Server('', $config);
	}

	public function dataTestQuery() {
		return [
			['ActivityManager', '\OC\Activity\Manager'],
			['ActivityManager', '\OCP\Activity\IManager'],
			['AllConfig', '\OC\AllConfig'],
			['AllConfig', '\OCP\IConfig'],
			['AppConfig', '\OC\AppConfig'],
			['AppConfig', '\OCP\IAppConfig'],
			['AppHelper', '\OC\AppHelper'],
			['AppHelper', '\OCP\IHelper'],
			['AppManager', '\OC\App\AppManager'],
			['AppManager', '\OCP\App\IAppManager'],
			['AsyncCommandBus', '\OC\Command\AsyncBus'],
			['AsyncCommandBus', '\OCP\Command\IBus'],
			['AvatarManager', '\OC\AvatarManager'],
			['AvatarManager', '\OCP\IAvatarManager'],

			['CapabilitiesManager', '\OC\CapabilitiesManager'],
			['ContactsManager', '\OC\ContactsManager'],
			['ContactsManager', '\OCP\Contacts\IManager'],
			['ContentSecurityPolicyManager', '\OC\Security\CSP\ContentSecurityPolicyManager'],
			['CommentsManager', '\OCP\Comments\ICommentsManager'],
			['Crypto', '\OC\Security\Crypto'],
			['Crypto', '\OCP\Security\ICrypto'],
			['CryptoWrapper', '\OC\Session\CryptoWrapper'],
			['CsrfTokenManager', '\OC\Security\CSRF\CsrfTokenManager'],

			['DatabaseConnection', '\OC\DB\Connection'],
			['DatabaseConnection', '\OCP\IDBConnection'],
			['DateTimeFormatter', '\OC\DateTimeFormatter'],
			['DateTimeFormatter', '\OCP\IDateTimeFormatter'],
			['DateTimeZone', '\OC\DateTimeZone'],
			['DateTimeZone', '\OCP\IDateTimeZone'],
			['Db', '\OC\AppFramework\Db\Db'],
			['Db', '\OCP\IDb'],

			['EncryptionFileHelper', '\OC\Encryption\File'],
			['EncryptionFileHelper', '\OCP\Encryption\IFile'],
			['EncryptionKeyStorage', '\OC\Encryption\Keys\Storage'],
			['EncryptionKeyStorage', '\OCP\Encryption\Keys\IStorage'],
			['EncryptionManager', '\OC\Encryption\Manager'],
			['EncryptionManager', '\OCP\Encryption\IManager'],
			['EventLogger', '\OCP\Diagnostics\IEventLogger'],

			['GroupManager', '\OC\Group\Manager'],
			['GroupManager', '\OCP\IGroupManager'],

			['Hasher', '\OC\Security\Hasher'],
			['Hasher', '\OCP\Security\IHasher'],
			['HTTPHelper', '\OC\HTTPHelper'],
			['HttpClientService', '\OC\Http\Client\ClientService'],
			['HttpClientService', '\OCP\Http\Client\IClientService'],

			['IniWrapper', '\bantu\IniGetWrapper\IniGetWrapper'],
			['MimeTypeDetector', '\OCP\Files\IMimeTypeDetector'],
			['MimeTypeDetector', '\OC\Files\Type\Detection'],

			['JobList', '\OC\BackgroundJob\JobList'],
			['JobList', '\OCP\BackgroundJob\IJobList'],

			['L10NFactory', '\OC\L10N\Factory'],
			['L10NFactory', '\OCP\L10N\IFactory'],
			['LockingProvider', '\OCP\Lock\ILockingProvider'],
			['Logger', '\OC\Log'],
			['Logger', '\OCP\ILogger'],

			['Mailer', '\OC\Mail\Mailer'],
			['Mailer', '\OCP\Mail\IMailer'],
			['MemCacheFactory', '\OC\Memcache\Factory'],
			['MemCacheFactory', '\OCP\ICacheFactory'],
			['MountConfigManager', '\OC\Files\Config\MountProviderCollection'],
			['MountConfigManager', '\OCP\Files\Config\IMountProviderCollection'],

			['NavigationManager', '\OC\NavigationManager'],
			['NavigationManager', '\OCP\INavigationManager'],
			['NotificationManager', '\OC\Notification\Manager'],
			['NotificationManager', '\OCP\Notification\IManager'],
			['UserCache', '\OC\Cache\File'],
			['UserCache', '\OCP\ICache'],

			['PreviewManager', '\OC\PreviewManager'],
			['PreviewManager', '\OCP\IPreview'],

			['QueryLogger', '\OCP\Diagnostics\IQueryLogger'],

			['Request', '\OC\AppFramework\Http\Request'],
			['Request', '\OCP\IRequest'],
			['RootFolder', '\OC\Files\Node\Root'],
			['RootFolder', '\OC\Files\Node\Folder'],
			['RootFolder', '\OCP\Files\IRootFolder'],
			['RootFolder', '\OCP\Files\Folder'],
			['Router', '\OCP\Route\IRouter'],

			['Search', '\OC\Search'],
			['Search', '\OCP\ISearch'],
			['SecureRandom', '\OC\Security\SecureRandom'],
			['SecureRandom', '\OCP\Security\ISecureRandom'],
			['ShareManager', '\OC\Share20\Manager'],
			['ShareManager', '\OCP\Share\IManager'],
			['SystemConfig', '\OC\SystemConfig'],

			['URLGenerator', '\OC\URLGenerator'],
			['URLGenerator', '\OCP\IURLGenerator'],
			['UserManager', '\OC\User\Manager'],
			['UserManager', '\OCP\IUserManager'],
			['UserSession', '\OC\User\Session'],
			['UserSession', '\OCP\IUserSession'],

			['TagMapper', '\OC\Tagging\TagMapper'],
			['TagMapper', '\OCP\AppFramework\Db\Mapper'],
			['TagManager', '\OC\TagManager'],
			['TagManager', '\OCP\ITagManager'],
			['TempManager', '\OC\TempManager'],
			['TempManager', '\OCP\ITempManager'],
			['TrustedDomainHelper', '\OC\Security\TrustedDomainHelper'],

			['SystemTagManager', '\OCP\SystemTag\ISystemTagManager'],
			['SystemTagObjectMapper', '\OCP\SystemTag\ISystemTagObjectMapper'],
		];
	}

	/**
	 * @dataProvider dataTestQuery
	 *
	 * @param string $serviceName
	 * @param string $instanceOf
	 */
	public function testQuery($serviceName, $instanceOf) {
		$this->assertInstanceOf($instanceOf, $this->server->query($serviceName), 'Service "' . $serviceName . '"" did not return the right class');
	}

	public function testGetCertificateManager() {
		$this->assertInstanceOf('\OC\Security\CertificateManager', $this->server->getCertificateManager('test'), 'service returned by "getCertificateManager" did not return the right class');
		$this->assertInstanceOf('\OCP\ICertificateManager', $this->server->getCertificateManager('test'), 'service returned by "getCertificateManager" did not return the right class');
	}

	public function testCreateEventSource() {
		$this->assertInstanceOf('\OC_EventSource', $this->server->createEventSource(), 'service returned by "createEventSource" did not return the right class');
		$this->assertInstanceOf('\OCP\IEventSource', $this->server->createEventSource(), 'service returned by "createEventSource" did not return the right class');
	}

	public function testOverwriteDefaultCommentsManager() {
		$config = $this->server->getConfig();
		$defaultManagerFactory = $config->getSystemValue('comments.managerFactory', '\OC\Comments\ManagerFactory');

		$config->setSystemValue('comments.managerFactory', '\Test\Comments\FakeFactory');

		$manager = $this->server->getCommentsManager();
		$this->assertInstanceOf('\OCP\Comments\ICommentsManager', $manager);

		$config->setSystemValue('comments.managerFactory', $defaultManagerFactory);
	}

	/**
	 * @dataProvider providesServiceLoader
	 */
	public function testServiceLoader($xmlPath, $expects) {
		if ($expects === false) {
			$this->expectException(\Exception::class);
			\iterator_to_array($this->server->load($xmlPath));
		} else {
			$iter = \iterator_to_array($this->server->load($xmlPath));
			$this->assertInstanceOf($expects, $iter[0]);
		}
	}

	public function providesServiceLoader() {
		return [
			[['name'], false],
			[['sabre', 'plugins'], CommentsPlugin::class]
		];
	}
}
