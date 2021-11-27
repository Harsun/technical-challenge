FROM node:12-alpine

WORKDIR /usr/app

COPY ./app/ .

RUN npm install  && npm install react &&  npm install react-scripts && npm run-script build 



FROM nginx:1.20.2-alpine

WORKDIR /usr/share/nginx/html

COPY --from=0 /usr/app/build/ ./
