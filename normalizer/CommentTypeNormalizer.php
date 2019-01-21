<?php

namespace PhpBenchmarksUbiquity\RestApi\normalizer;

use Ubiquity\translation\Translator;
use PhpBenchmarksRestData\CommentType;
use Ubiquity\contents\normalizers\NormalizerInterface;

class CommentTypeNormalizer implements NormalizerInterface {
	
	/**
	 * @var Translator
	 */
	private $translator;
	
	
	public function __construct(Translator $translator){
		$this->translator=$translator;
	}

	public function supportsNormalization($data) {
		return $data instanceof CommentType;
	}

	public function normalize($object) {
		return [
				'id' => $object->getId(),
				'name' => $object->getName(),
				'translated' => $this->translator->trans('translated.3000', [], 'phpbenchmarks'),
		];
	}
}

