<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use PhpBenchmarksRestData\User;
use Ubiquity\translation\Translator;
use Ubiquity\contents\normalizers\NormalizerInterface;
use Ubiquity\contents\normalizers\NormalizersManager;

class UserNormalizer implements NormalizerInterface {
	
	/**
	 * @var Translator
	 */
	private $translator;
	
	public function __construct(Translator $translator){
		$this->translator=$translator;
	}

	public function supportsNormalization($data) {
		return $data instanceof User;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'login' => $object->getLogin(),
				'createdAt' => $object->getCreatedAt()->format('Y-m-d H:i:s'),
				'translated' => $this->translator->trans('translated.1000', [], 'phpbenchmarks'),
				'comments' => NormalizersManager::normalizeArray_($object->getComments())
		];
	}
}

