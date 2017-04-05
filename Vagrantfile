# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  # config.vm.box     = "centos/6"
  # config.vm.box_url = "https://atlas.hashicorp.com/centos/boxes/6/versions/1610.01/providers/virtualbox.box"

  config.vm.box     = "CentOS6.5"
  config.vm.box_url = "https://github.com/2creatives/vagrant-centos/releases/download/v6.5.3/centos65-x86_64-20140116.box"

  config.vm.network "private_network", ip: "192.168.67.30"

  # chef
  # config.omnibus.chef_version = "12.0"
  config.omnibus.chef_version = :latest

  config.vm.synced_folder ".", "/vagrant",
    :owner => "vagrant", :group => "vagrant",
    :mount_options => ["dmode=777,fmode=777"]

    config.vm.provision :chef_solo do |chef|
      chef.cookbooks_path = ["cookbooks"]
      # chef.data_bags_path = ["data_bags"]
      # %w{yum-epel httpd httpd::php mysql mysql::create_db mysql::create_user virtualhosts vsftpd iptables}.each do |re|
      %w{yum-remi yum-epel httpd httpd::php71 mysql mysql::create_db mysql::create_user virtualhosts vsftpd iptables}.each do |re|
        chef.add_recipe re
      end

      chef.json = {
        "iptables"=> {
          "rule"=> [
            {"port"=> "21"},
            {"port"=> "80"},
            {"port"=> "3306"}
          ]
        },
        "mysql"=> {
          "root_password"=> "password!",
          "schema"=> ["MajicTV"],
          "users"=> [
            {
              "name"=> "majictv",
              "password"=> "pT7jCRwZMu32Rd7G",
              "role"=> "admin",
              "permit_host"=> ["127.0.0.1", "localhost", "%"]
            }
          ],
          "max_allowed_packet"=> "6M"
        },
        "virtualhosts"=> {
          "rotate"=> 4,
          "vh_list"=> [
            {
              "name"=> "majictv",
              "param"=> {
                "template"=> "vagrant",
                "documentroot" => "/vagrant",
                "email"=> "hoge@hoge.majictv.jp",
                "ipaddr"=> "192.168.67.30",
                "fqdn"=> "hoge.majictv.jp",
                "ftp_id"=> "majictv_ftpuser",
                "ftp_password"=> "majictv_ftpuserpass",
                "basic_id"=> "majictv.author",
                "basic_password"=> "majictv.authorpass"
              }
            }
          ]
        }
      }
    end
end
