if ! [[ "18.04 20.04 22.04 23.04" == *"$(lsb_release -rs)"* ]];
then
echo "Ubuntu $(lsb_release -rs) is not currently supported.";
exit;
fi

apt update && curl https://packages.microsoft.com/keys/microsoft.asc | tee /etc/apt/trusted.gpg.d/microsoft.asc

apt update && curl https://packages.microsoft.com/config/ubuntu/$(lsb_release -rs)/prod.list | tee /etc/apt/sources.list.d/mssql-release.list

apt update
apt update && ACCEPT_EULA=Y apt install -y msodbcsql18
apt update && ACCEPT_EULA=Y apt install -y mssql-tools18
echo 'export PATH="$PATH:/opt/mssql-tools18/bin"' >> ~/.bashrc
source ~/.bashrc
apt update && apt install -y unixodbc-dev
apt update && pecl install sqlsrv
apt update && pecl install pdo_sqlsrv
apt update && su
printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/8.2/mods-available/sqlsrv.ini
printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/8.2/mods-available/pdo_sqlsrv.ini
exit
phpenmod sqlsrv pdo_sqlsrv