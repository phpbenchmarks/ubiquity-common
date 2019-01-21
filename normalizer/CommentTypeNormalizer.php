<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use PhpBenchmarksRestData\CommentType;
use Ubiquity\contents\normalizers\NormalizerInterface;
use Ubiquity\translation\TranslatorManager;

class CommentTypeNormalizer implements NormalizerInterface {

	public function supportsNormalization($data) {
		return $data instanceof CommentType;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'name' => $object->getName(),
				'translated' => TranslatorManager::trans('translated.3000', [], 'phpbenchmarks'),
		];
	}
}

