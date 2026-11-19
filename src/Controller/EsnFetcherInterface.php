<?php

namespace EsnTest\Controller;

/**
 * Interface for class EsnFetcher.
 */
interface EsnFetcherInterface {

  /**
   * Performs a request to the endpoint provided to the API.
   *
   * @return string
   *   The API response as JSON; needs to be transformed to array/object.
   */
  public function getEsnData(): string;

  /**
   * Performs a request to fetch news.
   *
   * @return array
   *   An array with the fetched articles.
   */
  public function getArticles(): array;

  /**
   * Counts the number of articles fetched.
   *
   * @return int
   *   The number of articles fetched.
   */
  public function countArticles(): int;

  /**
   * Get information from the card requested.
   *
   * @param string $card
   *   The card to get the info.
   *
   * @return array
   *   An indexed array with the card data if exists. Empty array otherwise.
   */
  public function getCardData(string $card): array;

}
