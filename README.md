## Описание проекта

Для удобства развёртывания использован Docker, и файлы `.env` оставлены.

## Развертывание проекта

1. **Клонируйте репозиторий:**


```bash
	git clone https://github.com/Zasetsky/records.git
	cd records
```

2. **Запустите Docker Compose:**

```bash
	docker-compose up --build -d
```
	
3. **После создания контейнеров вы можете проследить за установкой зависимостей:**

```bash
	docker-compose logs -f
```

Приложение будет доступно по адресу: `http://localhost:8000`

## Режим разработки

### Бэкенд:

```bash
	cd records-api
	docker-compose up --build
```
	
### Фронтенд:

```bash
	cd records-front
	npm install
	npm run serve
```

Фронтенд будет доступен по адресу: `http://localhost:5173`

Бэкенд будет доступен по адресу: `http://localhost:8000`