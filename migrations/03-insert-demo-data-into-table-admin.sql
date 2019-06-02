INSERT INTO `admin`
  (`login`, `password`, `email`)
VALUES
  ('admin', SHA2('123', 512), 'test@test.com')
