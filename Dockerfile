# Этап 1: Сборка фронтенда
FROM node:18 AS build

WORKDIR /app

COPY ./records-front/package*.json ./

RUN npm install

COPY ./records-front/ ./

RUN npm run build

# Этап 2: Настройка Nginx
FROM nginx:latest

COPY --from=build /app/dist /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
