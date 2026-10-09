FROM oven/bun:1 AS base
WORKDIR /app
COPY package.json bun.lock ./
RUN bun install
COPY . .
EXPOSE 3010
CMD ["bun", "run", "dev", "--host", "0.0.0.0", "--port", "3010"]
