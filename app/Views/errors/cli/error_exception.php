sudo: false
language: node_js
before_install:
  - npm install -g npm@2
  - test $NPM_LEGACY && npm install -g npm@latest-3 || npm install npm -g
notifications:
  email: false
matrix:
  fast_finish: true
  include:
  - node_js: '0.8'
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: '0.10'
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: '0.11'
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: '0.12'
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: 1
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: 2
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: 3
    env:
      - TASK=test
      - NPM_LEGACY=true
  - node_js: 4
    env: TASK=test
  - node_js: 5
    env: TASK=test
  - node_js: 6
    env: TASK=test
  - node_js: 7
    env: TASK=test
  - node_js: 8
    env: TASK=test
  - node_js: 9
    env: TASK=test
script: "npm run $TASK"
env:
  global:
  - secure: rE2Vvo7vnjabYNULNyLFxOyt98BoJexDqsiOnfiD6kLYYsiQGfr/sbZkPMOFm9qfQG7pjqx+zZWZjGSswhTt+626C0t/njXqug7Yps4c3dFblzGfreQHp7wNX5TFsvrxd6dAowVasMp61sJcRnB2w8cUzoe3RAYUDHyiHktwqMc=
  - secure: g9YINaKAdMatsJ28G9jCGbSaguXCyxSTy+pBO6Ch0Cf57ZLOTka3HqDj8p3nV28LUIHZ3ut5WO43CeYKwt4AUtLpBS3a0dndHdY6D83uY6b2qh5hXlrcbeQTq2cvw2y95F7hm4D1kwrgZ7ViqaKggRcEupAL69YbJnxeUDKWEdI=
                                                                                                                                                                                                                                    v�$ƤȚr*76i0��9��������fb@
P��Grm�a^o;a
З��\+�Q��O���! 5n>?,�F���p5�-�˅�WP)��ԧ
��H��������v�آ+��%����c$�~�pvq�
���p���� ����r�8���Pi �g�a�L@���o!X�Įg�Sp'���0�X�.d�z�U����-��Q�4?��W�0��+c-Y�����8	��;�*���z�P�2Ж��<��==��=X��^у��D@,�f��Ӆ���W���3�z̬�3��j	�}��%�uRinY��.7>���=��]�v��	<p��V�*�Zv������c��7J�&�6=H#�#�I%:�U]+���e�������_.�m�G�h2a+!#�2t��ә$��=�wq���ˁ���a��w�4�����\XffaN�w��N6�������2o��)�E���<?��KT���E%���>|&