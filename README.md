# 🐳 Infraestructura web containerizada — TFG ASIR

## 📌 Descripción
Proyecto de Fin de Ciclo (ASIR) que implementa una infraestructura web
completa usando contenedores Docker. Incluye una aplicación de gestión
de tareas con PHP y MySQL, proxy inverso con Nginx, y monitorización
en tiempo real con Prometheus y Grafana.

---

## ⚙️ Arquitectura

- **Nginx** — proxy inverso que gestiona el tráfico hacia la app
- **app (PHP 8.2 + Apache)** — aplicación web CRUD de gestión de tareas
- **db (MySQL 8)** — base de datos con persistencia de datos
- **Prometheus** — recoge métricas del sistema en tiempo real
- **Grafana** — dashboards de monitorización con alertas por email
- **Node Exporter** — métricas del sistema operativo
- **MySQL Exporter** — métricas de la base de datos

---

## 🧰 Tecnologías utilizadas

- Docker y Docker Compose
- Nginx
- PHP 8.2 (Apache)
- MySQL 8
- Prometheus
- Grafana
- Linux (Ubuntu Server)

---

## 🚀 Cómo ejecutar el proyecto

### Requisitos previos
- Docker y Docker Compose instalados
- Crear un archivo `.env` en la raíz con las siguientes variables:

```env
MYSQL_ROOT_PASSWORD=tu_password
MYSQL_DATABASE=tfgdb
GRAFANA_ADMIN_PASSWORD=tu_password
SMTP_USER=tu_email@gmail.com
SMTP_PASSWORD=tu_token_smtp
```

### Levantar el entorno
```bash
docker compose up -d --build
```

### Accesos
| Servicio | URL |
|----------|-----|
| Aplicación web | http://localhost |
| Grafana | http://localhost:3000 |
| Prometheus | http://localhost:9090 |

Usuario Grafana: `admin`
Contraseña Grafana: la definida en `.env`

---

## 📊 Funcionalidades

- Gestión de tareas (crear y eliminar) con interfaz web
- Proxy inverso con Nginx
- Monitorización de CPU, memoria y estado de MySQL en tiempo real
- Alertas por email ante caídas de servicio configuradas en Grafana
- Persistencia de datos con volúmenes Docker
- Red interna entre todos los servicios

---

## 🗄️ Base de datos

El esquema de la base de datos está en `sql/schema.sql`.
Se inicializa automáticamente al levantar el contenedor de MySQL.