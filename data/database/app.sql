CREATE TABLE IF NOT EXISTS systemuser (
                id bigserial NOT NULL PRIMARY KEY,
                LOGIN varchar(200) NOT NULL,
                PASSWORD text,
                nome varchar(200) NOT NULL,
                email varchar(200) NOT NULL,
                created_at timestamp DEFAULT CURRENT_TIMESTAMP,
                updated_at timestamp
)
        WITH (
                OIDS = TRUE
);

CREATE TABLE IF NOT EXISTS ROLE (
                id serial NOT NULL,
                role_name varchar(45) NOT NULL,
                status char(1) NOT NULL,
                PRIMARY KEY (id),
                created_at timestamp DEFAULT CURRENT_TIMESTAMP,
                updated_at timestamp
)
        WITH (
                OIDS = TRUE
);

CREATE TABLE IF NOT EXISTS permission (
                id bigserial NOT NULL,
                url_name varchar(45) NOT NULL,
                description text,
                PRIMARY KEY (id))
        WITH (
                OIDS = TRUE
);

CREATE TABLE IF NOT EXISTS user_role (
                id serial NOT NULL,
                user_id bigint NOT NULL,
                role_id bigint NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (user_id) REFERENCES systemuser (id) ON DELETE CASCADE,
                FOREIGN KEY (role_id) REFERENCES ROLE (id) ON DELETE CASCADE
)
        WITH (
                OIDS = TRUE
);

CREATE TABLE IF NOT EXISTS role_permission (
                id bigserial NOT NULL,
                role_id bigint,
                permission_id bigint,
                PRIMARY KEY (id),
                FOREIGN KEY (role_id) REFERENCES ROLE (id) ON DELETE CASCADE,
                FOREIGN KEY (permission_id) REFERENCES permission (id) ON DELETE CASCADE
)
        WITH (
                OIDS = TRUE
);

CREATE TABLE IF NOT EXISTS user_permission (
                id bigserial NOT NULL,
                user_id bigint,
                permission_id bigint,
                PRIMARY KEY (id),
                FOREIGN KEY (user_id) REFERENCES systemuser (id) ON DELETE CASCADE,
                FOREIGN KEY (permission_id) REFERENCES permission (id) ON DELETE CASCADE
)
        WITH (
                OIDS = TRUE
);

