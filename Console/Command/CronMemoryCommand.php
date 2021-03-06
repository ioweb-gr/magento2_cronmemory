<?php
    /**
     * Copyright (c) 2018. IOWEB TECHNOLOGIES
     */

    /**
     * Created by IntelliJ IDEA.
     * User: gabtz
     * Date: 16/12/2018
     * Time: 9:24 μμ
     */

    namespace Ioweb\CronMemory\Console\Command;


    use Magento\Cron\Console\Command\CronCommand;
    use Magento\Framework\App\DeploymentConfig;
    use Magento\Framework\App\ObjectManagerFactory;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    class CronMemoryCommand extends CronCommand
    {
        public function __construct(ObjectManagerFactory $objectManagerFactory, DeploymentConfig $deploymentConfig = null)
        {
            parent::__construct($objectManagerFactory, $deploymentConfig);
        }

        protected function configure()
        {
            parent::configure();
            $this->addOption('limit', null, InputOption::VALUE_REQUIRED);
            $this->setName('ioweb:cron:run')
                ->setDescription('Runs jobs by schedule')
            ;
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $limit = $input->getOption('limit');
            ini_set('memory_limit', $limit);
            return parent::execute($input, $output);
        }


    }