<?php

namespace Tenacity\Manifest;

require_once('ManifestInterface.php');

class JsonManifest implements ManifestInterface
{
  /** @var array */
  public $manifest;
  /** @var string */
  public $dist;

  /**
   * Constructor
   * 
   * @param string $manifestPath local filesystem path to JSON-encoded manifest
   * @param string $distUri Remote URI to assets root
   */
  public function __construct($manifest, $distUri)
  {
    $this->manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
    $this->dist = $distUri;
  }

  /** @inheritdoc */
  public function get($asset)
  {
    return isset($this->manifest[$asset]) ? $this->manifest[$asset] : $asset;
  }
  /** @inheritdoc */
  public function getUri($asset)
  {
    return "{$this->dist}/{$this->get($asset)}";
  }
}