<?php

namespace EsnTest\Controller;

use EsnTest\Services\EsnApi;
use EsnTest\Services\EsnApiInterface;

/**
 * Class to fetch data from the APIs.
 */
class EsnFetcher implements EsnFetcherInterface {

  /**
   * EsnApi object.
   */
  protected EsnApiInterface $esnApi;

  /**
   * Contructor.
   */
  public function __construct() {

    // We load here the models that are needed.
    $this->esnApi = EsnApi::getInstance();
  }

  /**
   * {@inheritdoc}
   */
  public function getEsnData(): string {

    $resp = $this->esnApi->apiGetRequest('network');
    return $resp;
  }

  /**
   * {@inheritdoc}
   */
  public function getArticles(): array {

    $resp = $this->esnApi->apiGetNews();
    return json_decode($resp, TRUE) ?? [];
  }

  /**
   * {@inheritdoc}
   */
  public function getArticlebyId(int $id): array {

    $articles = $this->getArticles();
    return $this->findEntry($articles, 'id', (string) $id);
  }

  /**
   * {@inheritdoc}
   */
  public function countArticles(): int {

    $resp = $this->getArticles();
    return count($resp);
  }

  /**
   * {@inheritdoc}
   */
  public function getCardData(string $card): array {

    $resp = $this->esnApi->apiGetCard($card);
    $json = json_decode($resp, TRUE);
    if ($json) {
      $cardData = reset($json);

      return [
        'card_code' => $cardData['code'],
        'card_status' => $cardData['status'],
        'section_code' => $cardData['section-code'],
        'card_date' => $cardData['activation date'],
      ];
    }
    else {

      return [];
    }
  }

  /**
   * Search on a given array if a certain field matches with the given value.
   *
   * @param array $array
   *   The array to search into.
   * @param string $field
   *   The key of the field where to see if the value matches.
   * @param string $value
   *   The value that needs to exist in the array under the field given.
   *
   * @return array
   *   The array entry founded; empty otherwise.
   */
  protected function findEntry(array $array, string $field, string $value): array{
    $key = array_search($value, array_column($array, $field));

    return $key !== false ? $array[$key] : [];
  }

}
