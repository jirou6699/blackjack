# 【PHP】オブジェクト指向を使ってブラック・ジャックを作成

## 目的
ブラックジャックをオブジェクト指向を使って実装します。
機能追加・仕様変更のしやすい構成や読みやすいコードを体感・習得するために、3ステップで制作していきます。
各ステップで変更・リファクタリングした内容も記載することにしました。

ステップ１：ディーラーとプレイヤーの2人対戦型のコンソールゲーム作成
ステップ２：Aを1点or11点のどちらかで扱うようプログラムを修正
ステップ３：最大3人までのプレイヤーでプレイできるように修正

## 環境構築

```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# Docker コンテナ内でコマンドを実行する
docker-compose exec app php -v

# Docker コンテナの停止・削除
docker-compose down
```

## 環境構築 (Remote Development編)

Docker イメージをビルドする。

```bash
docker-compose build
```

VSCode の Remote-Containers: Open Folder in Container からコンテナを開く。

コマンドは VSCode のターミナルから実行する。

終了するときはコンテナを停止・削除する。

```bash
docker-compose down
```

### デバッグ (Xdebug)

デバッグしたい時は下記の順に実施する。

1. コードにブレークポイントを設定する
2. デバッグビューを開く
3. 「Listen for Xdebug」を選択してデバッグを開始する
4. コードを実行する

ブレークポイントで止まらない場合、 `.vscode/launch.json` の port が 9003 であることを確認する。
