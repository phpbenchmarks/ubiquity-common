<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use PhpBenchmarksRestData\Comment;
use Ubiquity\contents\normalizers\NormalizerInterface;
use Ubiquity\contents\normalizers\NormalizersManager;
use Ubiquity\translation\TranslatorManager;

class CommentNormalizer implements NormalizerInterface {

	public function supportsNormalization($data) {
		return $data instanceof Comment;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'message' => $object->getMessage(),
				'translated' => TranslatorManager::trans('translated.2000', [], 'phpbenchmarks'),
				'type' => NormalizersManager::normalize_($object->getType())
		];
	}
}

