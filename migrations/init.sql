CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE role_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    route_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_role_routes_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

INSERT INTO roles (id,name) VALUES (1,'administrator');
INSERT INTO roles (id,name) VALUES (2,'user');

INSERT INTO role_routes (role_id,route_path) VALUES (1,'default/*');
INSERT INTO role_routes (role_id,route_path) VALUES (1,'users/*');
INSERT INTO role_routes (role_id,route_path) VALUES (1,'roles/*');
INSERT INTO role_routes (role_id,route_path) VALUES (1,'routes/*');
INSERT INTO role_routes (role_id,route_path) VALUES (1,'user-roles/*');
INSERT INTO role_routes (role_id,route_path) VALUES (1,'application/*');

INSERT INTO role_routes (role_id,route_path) VALUES (2,'default/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'packages/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'package-items/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'customers/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'customer-fields/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'customer-metas/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'customer-packages/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'transactions/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'reports/*');

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_roles_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_user_roles_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    price DOUBLE NOT NULL,
    note TEXT NOT NULL,
    CONSTRAINT fk_packages_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE package_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    package_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT fk_package_items_id FOREIGN KEY (package_id) REFERENCES packages(id) ON DELETE CASCADE
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    package_id INT NULL,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT fk_customers_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_customers_package_id FOREIGN KEY (package_id) REFERENCES packages(id) ON DELETE SET NULL
);

CREATE TABLE customer_fields (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT fk_customer_fields_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE customer_metas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    customer_id INT NOT NULL,
    field_name VARCHAR(100) NOT NULL,
    field_value VARCHAR(100) NOT NULL,
    CONSTRAINT fk_customer_metas_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_customer_metas_customer_id FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    customer_id INT NOT NULL,
    total DOUBLE NOT NULL,
    proof_file VARCHAR(100) NOT NULL,
    note TEXT NULL,
    CONSTRAINT fk_transactions_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_transactions_customer_id FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);
