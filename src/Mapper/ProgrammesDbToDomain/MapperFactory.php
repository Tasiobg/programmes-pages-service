<?php

namespace BBC\ProgrammesPagesService\Mapper\ProgrammesDbToDomain;

class MapperFactory
{
    /** @var AbstractMapper[] */
    protected $instances = [];

    /** @var mixed[] */
    private $options = [
        // Most systems will want to look up the parent hierarchy to see if
        // there is a MasterBrand we can attach to the current item (i.e. use
        // the MasterBrand of the parent if the child has no MasterBrand).
        // However some legacy APIs we still need to maintain (e.g. Clifton) do
        // not expose the inherited MasterBrand, thus we need the ability to
        // switch between these two behaviors.
        'core_entity_inherit_master_brand' => true,
    ];

    /**
     * @param mixed[] $options An array of options for configuring mapper
     *                         behavior. See the $options property for valid
     *                         key names.
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
    }

    public function getOption(string $key)
    {
        return $this->options[$key];
    }

    public function getAtozTitleMapper(): AtozTitleMapper
    {
        if (!isset($this->instances['AtozTitleMapper'])) {
            $this->instances['AtozTitleMapper'] = new AtozTitleMapper($this);
        }

        return $this->instances['AtozTitleMapper'];
    }

    public function getBroadcastMapper(): BroadcastMapper
    {
        if (!isset($this->instances['BroadcastMapper'])) {
            $this->instances['BroadcastMapper'] = new BroadcastMapper($this);
        }

        return $this->instances['BroadcastMapper'];
    }

    public function getCategoryMapper(): CategoryMapper
    {
        if (!isset($this->instances['CategoryMapper'])) {
            $this->instances['CategoryMapper'] = new CategoryMapper($this);
        }

        return $this->instances['CategoryMapper'];
    }

    public function getContributionMapper(): ContributionMapper
    {
        if (!isset($this->instances['ContributionMapper'])) {
            $this->instances['ContributionMapper'] = new ContributionMapper($this);
        }

        return $this->instances['ContributionMapper'];
    }

    public function getContributorMapper(): ContributorMapper
    {
        if (!isset($this->instances['ContributorMapper'])) {
            $this->instances['ContributorMapper'] = new ContributorMapper($this);
        }

        return $this->instances['ContributorMapper'];
    }

    public function getCollapsedBroadcastMapper(): CollapsedBroadcastMapper
    {
        if (!isset($this->instances['CollapsedBroadcastMapper'])) {
            $this->instances['CollapsedBroadcastMapper'] = new CollapsedBroadcastMapper($this);
        }

        return $this->instances['CollapsedBroadcastMapper'];
    }

    public function getCoreEntityMapper(): CoreEntityMapper
    {
        if (!isset($this->instances['CoreEntityMapper'])) {
            $this->instances['CoreEntityMapper'] = new CoreEntityMapper($this);
        }

        return $this->instances['CoreEntityMapper'];
    }

    public function getImageMapper(): ImageMapper
    {
        if (!isset($this->instances['ImageMapper'])) {
            $this->instances['ImageMapper'] = new ImageMapper($this);
        }

        return $this->instances['ImageMapper'];
    }

    public function getMasterBrandMapper(): MasterBrandMapper
    {
        if (!isset($this->instances['MasterBrandMapper'])) {
            $this->instances['MasterBrandMapper'] = new MasterBrandMapper($this);
        }

        return $this->instances['MasterBrandMapper'];
    }

    public function getNetworkMapper(): NetworkMapper
    {
        if (!isset($this->instances['NetworkMapper'])) {
            $this->instances['NetworkMapper'] = new NetworkMapper($this);
        }

        return $this->instances['NetworkMapper'];
    }

    public function getOptionsMapper(): OptionsMapper
    {
        if (!isset($this->instances['OptionsMapper'])) {
            $this->instances['OptionsMapper'] = new OptionsMapper($this);
        }

        return $this->instances['OptionsMapper'];
    }

    public function getPromotionMapper(): PromotionMapper
    {
        if (!isset($this->instances['PromotionMapper'])) {
            $this->instances['PromotionMapper'] = new PromotionMapper($this);
        }

        return $this->instances['PromotionMapper'];
    }

    public function getRelatedLinkMapper(): RelatedLinkMapper
    {
        if (!isset($this->instances['RelatedLinkMapper'])) {
            $this->instances['RelatedLinkMapper'] = new RelatedLinkMapper($this);
        }

        return $this->instances['RelatedLinkMapper'];
    }

    public function getSegmentMapper(): SegmentMapper
    {
        if (!isset($this->instances['SegmentMapper'])) {
            $this->instances['SegmentMapper'] = new SegmentMapper($this);
        }

        return $this->instances['SegmentMapper'];
    }

    public function getSegmentEventMapper(): SegmentEventMapper
    {
        if (!isset($this->instances['SegmentEventMapper'])) {
            $this->instances['SegmentEventMapper'] = new SegmentEventMapper($this);
        }

        return $this->instances['SegmentEventMapper'];
    }

    public function getServiceMapper(): ServiceMapper
    {
        if (!isset($this->instances['ServiceMapper'])) {
            $this->instances['ServiceMapper'] = new ServiceMapper($this);
        }

        return $this->instances['ServiceMapper'];
    }

    public function getVersionMapper(): VersionMapper
    {
        if (!isset($this->instances['VersionMapper'])) {
            $this->instances['VersionMapper'] = new VersionMapper($this);
        }

        return $this->instances['VersionMapper'];
    }

    public function getVersionTypeMapper(): VersionTypeMapper
    {
        if (!isset($this->instances['VersionTypeMapper'])) {
            $this->instances['VersionTypeMapper'] = new VersionTypeMapper($this);
        }

        return $this->instances['VersionTypeMapper'];
    }
}
