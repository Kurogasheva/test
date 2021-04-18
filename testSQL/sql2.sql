SELECT c.id, c.name, p.name, COUNT(cmp.member_id) as count_permissions
FROM communities c
         JOIN community_members cm on c.id = cm.community_id
         JOIN community_member_permissions cmp on cm.id = cmp.member_id
         JOIN permissions p on cmp.permission_id = p.id
GROUP BY c.id, p.id
HAVING count_permissions >= 5
ORDER BY c.id DESC, count_permissions
LIMIT 100;

/*
 Необходимо написать запрос, по которому будут выданы идентификаторы сообществ, названия сообществ, названия разрешений
 и количество пользователей, имеющих соответствующее разрешение внутри сообщества. Вывести записи с количеством
 разрешений не менее 5. Результаты должны быть отсортированы по убыванию идентификаторов сообщества и возрастанию
 количества разрешений. Количество возвращаемых результатов должно быть не более 100.
 */