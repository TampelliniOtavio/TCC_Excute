CREATE DATABASE IF NOT EXISTS banquitomeu DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER DATABASE banquitomeu DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE banquitomeu;

CREATE TABLE IF NOT EXISTS users (
  user int(11) NOT NULL AUTO_INCREMENT,
  username varchar(200) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(32) NOT NULL,
  registerdate datetime DEFAULT NOW(),
  PRIMARY KEY (user),
  UNIQUE KEY email (email)
) ENGINE=InnoDB  AUTO_INCREMENT=1 ;

INSERT INTO `users` (`user`, `username`, `email`, `password`, `registerdate`) VALUES ('1', 'opa', 'opa', 'MTIzNA==', CURRENT_TIMESTAMP);

CREATE TABLE IF NOT EXISTS avaliacao(
  turma varchar(100) NOT NULL,
  avaliador varchar(200) NOT NULL,
  nome_projeto varchar(200) NOT NULL,
  pertinencia_tema int(2) NOT NULL,
  aplicabilidade int(2) NOT NULL,
  construcao int(2) NOT NULL,
  funcionabilidade int(2) NOT NULL,
  dominio int(2) NOT NULL,
  apresentacao int(2) NOT NULL,
  total int(2) NOT NULL,
  aprovado varchar(3) NOT NULL
)ENGINE=InnoDB;