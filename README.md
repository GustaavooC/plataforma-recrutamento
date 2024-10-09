




# Plataforma de Recrutamento - Análise de Currículos com ChatGPT

Este projeto é uma plataforma simples para upload e análise de currículos usando a API GPT-4 da OpenAI. O sistema permite que os usuários façam o upload de seus currículos, que são então analisados pela inteligência artificial, gerando um feedback com base nas informações contidas no currículo.

## Funcionalidades

- **Upload de Currículo**: O usuário pode enviar seu currículo no formato de arquivo.
- **Análise do Currículo**: O conteúdo do currículo é enviado para a API da OpenAI (GPT-4), que gera um feedback sobre as qualificações, experiência e habilidades descritas no currículo.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para o desenvolvimento do backend.
- **OpenAI GPT-4**: API para análise de texto.
- **Blade**: Engine de templates do Laravel para renderizar as páginas.

## Como Rodar o Projeto

### Requisitos

- **PHP 8.2+**
- **Laravel 11.27.2**
- **Composer**
- **Chave de API da OpenAI** (disponível após inscrição em [OpenAI](https://openai.com/)).

### Passos para Configuração

1. Clone o repositório para sua máquina local:

   ```bash
   git clone https://github.com/seu-usuario/plataforma-recrutamento.git
   cd plataforma-recrutamento
   ```

2. Instale as dependências do Laravel com o Composer:

   ```bash
   composer install
   ```

3. Copie o arquivo `.env.example` para criar o arquivo `.env`:

   ```bash
   cp .env.example .env
   ```

4. Gere a chave de aplicação do Laravel:

   ```bash
   php artisan key:generate
   ```

5. Configure a chave da API OpenAI no arquivo `.env`:

   ```env
   OPENAI_API_KEY=your-openai-api-key-here
   ```

6. Rode as migrações do banco de dados:

   ```bash
   php artisan migrate
   ```

7. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

8. Acesse o aplicativo em [http://localhost:8000](http://localhost:8000).

## Erros Encontrados e Soluções

### Erro: `Method Not Allowed`

**Descrição**: Ao tentar realizar o upload do currículo, o sistema retornava o erro `Method Not Allowed`.

**Solução**: O erro foi causado por rotas duplicadas no arquivo `web.php`. A solução foi remover a duplicação da rota de upload e garantir que o método `POST` estivesse corretamente configurado na rota `/resume/upload`.

### Erro: `Undefined property '$apiKey'`

**Descrição**: O erro `Undefined property '$apiKey'` ocorreu porque a chave da API não estava sendo definida corretamente no serviço `ChatGPTService`.

**Solução**: A propriedade `$apiKey` foi corretamente definida no construtor da classe `ChatGPTService` utilizando a função `env('OPENAI_API_KEY')`.

```php
$this->apiKey = env('OPENAI_API_KEY');
if (!$this->apiKey) {
    throw new \Exception('API Key is not set in the .env file');
}
```

## Licença

Este projeto está licenciado sob a MIT License - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

```

Este `README.md` descreve o projeto de forma concisa, detalha o processo de configuração e os erros encontrados, focando apenas nas funcionalidades de upload e análise de currículos.
# Plataforma de Recrutamento - Análise de Currículos com ChatGPT

Este projeto é uma plataforma simples para upload e análise de currículos usando a API GPT-4 da OpenAI. O sistema permite que os usuários façam o upload de seus currículos, que são então analisados pela inteligência artificial, gerando um feedback com base nas informações contidas no currículo.

## Funcionalidades

- **Upload de Currículo**: O usuário pode enviar seu currículo no formato de arquivo.
- **Análise do Currículo**: O conteúdo do currículo é enviado para a API da OpenAI (GPT-4), que gera um feedback sobre as qualificações, experiência e habilidades descritas no currículo.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para o desenvolvimento do backend.
- **OpenAI GPT-4**: API para análise de texto.
- **Blade**: Engine de templates do Laravel para renderizar as páginas.

## Como Rodar o Projeto

### Requisitos

- **PHP 8.2+**
- **Laravel 11.27.2**
- **Composer**
- **Chave de API da OpenAI** (disponível após inscrição em [OpenAI](https://openai.com/)).

### Passos para Configuração

1. Clone o repositório para sua máquina local:

   ```bash
   git clone https://github.com/seu-usuario/plataforma-recrutamento.git
   cd plataforma-recrutamento
   ```

2. Instale as dependências do Laravel com o Composer:

   ```bash
   composer install
   ```

3. Copie o arquivo `.env.example` para criar o arquivo `.env`:

   ```bash
   cp .env.example .env
   ```

4. Gere a chave de aplicação do Laravel:

   ```bash
   php artisan key:generate
   ```

5. Configure a chave da API OpenAI no arquivo `.env`:

   ```env
   OPENAI_API_KEY=your-openai-api-key-here
   ```

6. Rode as migrações do banco de dados:

   ```bash
   php artisan migrate
   ```

7. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

8. Acesse o aplicativo em [http://localhost:8000](http://localhost:8000).

## Erros Encontrados e Soluções

### Erro: `Method Not Allowed`

**Descrição**: Ao tentar realizar o upload do currículo, o sistema retornava o erro `Method Not Allowed`.

**Solução**: O erro foi causado por rotas duplicadas no arquivo `web.php`. A solução foi remover a duplicação da rota de upload e garantir que o método `POST` estivesse corretamente configurado na rota `/resume/upload`.

### Erro: `Undefined property '$apiKey'`

**Descrição**: O erro `Undefined property '$apiKey'` ocorreu porque a chave da API não estava sendo definida corretamente no serviço `ChatGPTService`.

**Solução**: A propriedade `$apiKey` foi corretamente definida no construtor da classe `ChatGPTService` utilizando a função `env('OPENAI_API_KEY')`.

```php
$this->apiKey = env('OPENAI_API_KEY');
if (!$this->apiKey) {
    throw new \Exception('API Key is not set in the .env file');
}
```

## Licença

Este projeto está licenciado sob a MIT License - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

```

