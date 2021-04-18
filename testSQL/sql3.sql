SELECT u.name, c.name, p.name
FROM users u
    JOIN community_members cm on u.id = cm.user_id
    JOIN communities c on cm.community_id = c.id
    JOIN community_member_permissions cmp on u.id = cmp.member_id
    JOIN permissions p on cmp.permission_id = p.id
WHERE (LOWER(u.name) LIKE '%t%'
  OR p.name LIKE '%articles%')
  AND LENGTH(c.name) >= 15

/*
 Необходимо написать запрос, по которому будут выданы все строки с именем пользователя, названием сообщества и
 названием разрешения, которое у него в этом сообществе. Имя пользователя должно содержать букву T в любом регистре или
 название разрешения должно содержать подстроку articles. Название сообщества должно содержать не менее 15 символов.
 */