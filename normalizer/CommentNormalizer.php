<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use Ubiquity\translation\Translator;
use PhpBenchmarksRestData\Comment;
use Ubiquity\contents\normalizers\NormalizerInterface;
use Ubiquity\contents\normalizers\NormalizersManager;

class CommentNormalizer implements NormalizerInterface {
	
	/**
	 * @var Translator
	 */
	private $translator;
	
	
	public function __construct(Translator $translator){
		$this->translator=$translator;
	}

	public function supportsNormalization($data) {
		return $data instanceof Comment;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'message' => $object->getMessage(),
				'translated' => $this->translator->trans('translated.2000', [], 'phpbenchmarks'),
				'type' => NormalizersManager::normalize_($object->getType())
		];
	}
}

