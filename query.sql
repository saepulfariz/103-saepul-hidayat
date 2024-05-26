-- QUERY GET TRANSACTION HISTORY BY DATE
SELECT
    CONVERT(datetime, date),
    (
        SELECT
            balance
        FROM
            transaction_history as b
        WHERE
            CONVERT(b.datetime, date) = CONVERT(a.datetime, date)
        ORDER BY
            b.id DESC
        LIMIT
            1
    ) as saldo
FROM
    transaction_history as a
GROUP BY
    CONVERT(datetime, date)
ORDER BY
    CONVERT(datetime, date) DESC
LIMIT
    0, 2;

-- Nilai Akhir - Nilai Awal = 15.000 - 12.000 = Rp3.000
-- Persentase kenaikan = 3.000 / 12.000
-- Persentase kenaikan = 0.25 x 100% = 25%
-- GET Pemasukan pengeluaran by date
SELECT
    CONVERT(datetime, date) as date,
    SUM(nominal) as saldo
FROM
    transactions as a
WHERE
    type = 'debit'
GROUP BY
    CONVERT(datetime, date)
ORDER BY
    CONVERT(datetime, date) DESC
LIMIT
    0, 2;