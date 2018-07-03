<?php

namespace app\models;

/**
 * Class Amount
 * @package app\models
 *
 * Класс для контроля колебания цены
 *
 * @property int $tolerance Допустимое отклонение в %
 * @property int $currentPrice Текущая цена
 * @property int $oldPrice Старая цена
 * @property float $result - Результат вычислений
 */
class Amount
{

    /** @var int Допустимое отклонение в % */
    private $tolerance;

    /** @var int Текущая цена */
    private $currentPrice;

    /** @var int Предыдущая цена */
    private $oldPrice;

    /** @var float Результат расчета в % */
    private $result;

    /**
     * Конструктор класса
     *
     * @param int $tolerance - допустимое отклонение в %
     * @param int $currentPrice - текущая цена
     * @param int $oldPrice - предыдущая цена
     * @param float $result - результат в %
     */
    public function __construct(int $tolerance, int $currentPrice, int $oldPrice = 0, float $result = 0)
    {
        $this->tolerance = $tolerance;
        $this->currentPrice = $currentPrice;
        $this->oldPrice = $oldPrice;
        $this->result = $result;
    }

    /**
     * Проверяет, является ли разница между текущей ценой и старой допустимой по отклонению
     *
     * @return bool
     * @throws \DivisionByZeroError
     */
    public function diff(): bool
    {
        if ($this->oldPrice !== 0) {
            $diff = ((float)$this->currentPrice / (float)$this->oldPrice - 1) * 100;
            $this->result = $diff;

            return (float)$this->tolerance > abs($this->result);
        }

        throw new \DivisionByZeroError('Невозможно вычислить разницу. Деление на ноль');
    }

    /**
     * Возвращает результат вычисления
     *
     * @return int
     */
    public function getAmount(): int
    {
        /** на случай, если число слишком большое, округляем его */
        return round($this->result, 2);
    }

}