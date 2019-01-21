<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use PhpBenchmarksRestData\User;
use Ubiquity\contents\normalizers\NormalizerInterface;
use Ubiquity\contents\normalizers\NormalizersManager;
use Ubiquity\translation\TranslatorManager;

class UserNormalizer implements NormalizerInterface {

	public function supportsNormalization($data) {
		return $data instanceof User;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'login' => $object->getLogin(),
				'createdAt' => $object->getCreatedAt()->format('Y-m-d H:i:s'),
				'translated' => TranslatorManager::trans('translated.1000', [], 'phpbenchmarks'),
				'comments' => NormalizersManager::normalizeArray_($object->getComments())
		];
	}
}

