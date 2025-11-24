openssl req \
    -newkey rsa:2048 \
    -x509 \
    -nodes \
    -keyout visible.priv.key \
    -new \
    -out orangehrmdev.priv.cert \
    -subj /CN=*.orangehrmdev.com \
    -reqexts SAN \
    -extensions SAN \
    -config <(cat /usr/lib/ssl/openssl.cnf \
        <(printf '[SAN]\nsubjectAltName=DNS:*.orangehrmdev.com')) \
    -sha256 \
    -days 3650
