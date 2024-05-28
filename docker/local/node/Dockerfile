FROM node:20

ENV HOST=0.0.0.0

WORKDIR /web

COPY ./web/package*.json .

RUN npm install

COPY ./web .

EXPOSE 5173

CMD ["npm", "run", "dev"]