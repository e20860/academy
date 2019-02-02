SELECT `id`, `town`,`crd`, (SELECT COUNT(*) FROM graduates WHERE graduates.locals_id = locals.id AND NOT graduates.rip) AS quant FROM locals WHERE 1

SELECT `locals_id`, GROUP_CONCAT(`fam` SEPARATOR '-') AS `list` FROM graduates WHERE `locals_id` IN(3,4,5) GROUP BY `locals_id` 

// Результирующий запрос
SELECT `id`, `town`,`crd`, 
(SELECT COUNT(*) FROM graduates WHERE graduates.locals_id = locals.id AND NOT graduates.rip) AS quant, 
(SELECT GROUP_CONCAT(`fam` SEPARATOR '-') FROM graduates WHERE `locals_id` =locals.id GROUP BY `locals_id`) AS `tips` 
FROM locals 
WHERE 1 