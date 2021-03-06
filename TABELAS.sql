CREATE TABLE UNIDADES(
	ID_UNIDADE SERIAL PRIMARY KEY,
	NOME_UNIDADE VARCHAR(30)
);

CREATE TABLE USUARIOS (
	ID_USUARIO SERIAL PRIMARY KEY,
	NOME_USUARIO VARCHAR(30),
	SENHA VARCHAR (20),
	EMAIL VARCHAR(50),
	CONTATO VARCHAR(50),
	ID_UNIDADE CHAR, /* UNIDADE PADRÃO, NÃO QUER DIZER QUE NÃO ATENDA OUTRAS*/
	TIPO CHAR /* T - TÉCNICO / A - ADMINISTRADOR / U- USUÁRIO */
);
	
CREATE TABLE PROVIDENCIAS(
	ID_PROVIDENCIA INTEGER,
	ID_CHAMADO INTEGER,
	ID_UNIDADE INTEGER REFERENCES UNIDADES, /* S- UPASB / M - UPAMIRANTE / A - CENTRO ADM / E - FUNEPUEDUCACIONAL */
	STATUS CHAR, /* N - NOVO CHAMADO / A - EM ATENDIMENTO / F - FECHADO / R- REABERTO */
	DESCRICAO VARCHAR(250),
	DATA_PROVIDENCIA DATE,
	HORA_PROVIDENCIA TIME,
	ID_PESSOA INTEGER REFERENCES USUARIOS,
    
	PRIMARY KEY (ID_PROVIDENCIA, ID_CHAMADO)
);


INSERT INTO USUARIOS 
VALUES(NEXTVAL('PESSOAS_ID_PESSOA_SEQ'),'RICKHO','123','RICKHO.VIEIRA@GMAIL.COM','34988136476', 'S', 'T');
INSERT INTO USUARIOS 
VALUES(NEXTVAL('PESSOAS_ID_PESSOA_SEQ'),'RAMON','123','RAMONSSANCHES@GMAIL.COM','TELEFONE UPA MIRANTE', 'M', 'T');
INSERT INTO USUARIOS 
VALUES(NEXTVAL('PESSOAS_ID_PESSOA_SEQ'),'LUIZ SERGIO','123','LUIZSPM@GMAIL.COM','TELEFONE UPA SB', 'S', 'T');