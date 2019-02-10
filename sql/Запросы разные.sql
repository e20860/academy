## Количество выпускников по городам
## *****************************************************************************************
SELECT `town`, ( SELECT COUNT(*) FROM `graduates` WHERE graduates.locals_id = locals.id ) AS `grad_cnt` FROM `locals` WHERE 1 ORDER BY `town`

## *****************************************************************************************
## Формирование статистики по городам
##                                   Результирующий запрос
SELECT `id`, `town`,`crd`, 
(SELECT COUNT(*) FROM graduates WHERE graduates.locals_id = locals.id AND NOT graduates.rip) AS quant, 
(SELECT GROUP_CONCAT(`fam` SEPARATOR '-') FROM graduates WHERE `locals_id` =locals.id GROUP BY `locals_id`) AS `hint` 
FROM locals 
WHERE 1 
